<?php

namespace App\Http\Controllers;

use App\Business\Admin\UsersCreateRequest;
use App\Business\Admin\UserService;
use App\Business\Admin\UsersUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UsersController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $users = $this->userService->findAllToPaginate()->paginate();

        return view('admin.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(UsersCreateRequest $request){
        $data = $request->all();
        $this->userService->save($data);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        $id = decrypt($id);
        $user = $this->userService->findById($id);

        return view('admin.users.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UsersUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UsersUpdateRequest $request, $id){
        $id = decrypt($id);
        $user = $this->userService->findById($id);

        $user = $this->userService->update($user, $request->all());

        if (!empty($user)){
            session()->flash('saved-correctly','Actualizado correctamente');
        }

        return redirect()->route('users.edit', encrypt($user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id){
        //
    }
}
