<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProjectsController extends Controller
{
     
    public function index()
    {
        if (Auth::check()) {
           $projects = Project::where('user_id',Auth::user()->id)->get();
           return view('projects.index',['projects'=>$projects]); 
        }
        return view('auth.login');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id=null)
    {
        $companies=null;
        if (!$company_id) {
            $companies=Company::where('user_id',Auth::user()->id)->get();
        }
        return view('projects.create',['company_id'=>$company_id, 'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Auth::check()) {
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'company_id' => $request->input('company_id'),
                'user_id' => Auth::user()->id
            ]);
            if ($project) {
                return redirect()->route('projects.show',['project'=> $project->id])->with('success','Project created successfully');
            }
        }
        return back()->withInput()->with('errors','Project not added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project=Project::find($project->id);
        $comments = $project->comments;
        return view('projects.show', ['project'=>$project, 'comments'=>$comments] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project=Project::find($project->id);
        return view('projects.edit', ['project'=>$project] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //save data 
        $projectUpdate= Project::where('id',$project->id)->update([
                                'name'=>$request->input('name'),
                                'description'=>$request->input('description')
        ]);
        if ($projectUpdate) {
            return redirect()->route('projects.show',['project'=>$project->id])->with('success','Project updated successfully');
        }

        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $findProject=Project::find($project->id);
        if ($findProject->delete()) {
            return redirect()->route('projects.index')->with('success','Project successfully deleted');
        }

        return back()->withInput()->with('errors','Project not deleted');
    }
    public function adduser(Request $request){
        //add user to project
        //take a project and add user to it
        $project = Project::find($request->input('project_id'));
        

        if(Auth::user()->id == $project->user_id){

            $user = User::where('email', $request->input('email'))->first();
            $projectUser = ProjectUser::where('user_id', $user->id)
                                        ->where('project_id', $project->id)
                                        ->first();

            #check if user is already added to the project
            if ($projectUser) {
                # if user already exists exit
                return redirect()->route('projects.show', ['project'=> $project->id])->with('errors', $request->input('email').' Already a member of this project');

            }                
            if ($user && $project) {
                $project->users()->attach($user->id);
                return redirect()->route('projects.show', ['project'=> $project->id])->with('success', $request->input('email').' User was added to project successfully');

            }
            return redirect()->route('projects.show', ['project'=> $project->id])->with('errors', $request->input('email').' Error adding User to project');
        
            
        }
        
        
    }
}
