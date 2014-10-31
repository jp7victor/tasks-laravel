<?php




class TasksController extends BaseController{
	

	
	public function index ()
	{

		//fetch all tasks
		$tasks = Task::with('user')->orderBy('created_at', 'desc')->get();
		$users = User::lists('username', 'id');

		//load a view to display
		return View::make('tasks.index', compact('tasks', 'users'));

	}

	public function show($id)
	{
		//fetch a single task
		$task = Task::findOrFail($id);
		
		//return $task;
		
		//load a view to display
		return View::make('tasks.show', compact('task'));

	}

	public function store()
	{


		$task = new Task(Input::all());

		if ( ! $task->save())
		{

			return Redirect::back()->withInput()->withErrors($task->getErrors());
		}

		return Redirect::home();

	}


	 public function update($id)
	 {

	 	$task = Task::find($id);
	 	$task->completed = Input::get('completed') ? Input::get('completed') : 0;
	 	$task->save();

	 	return Redirect::home();


	 }
}