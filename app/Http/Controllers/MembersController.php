<?php
namespace App\Http\Controllers;

use App\Http\Requests\MemberCreateRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MembersController extends CommonsController
{
    /**
     * object repository we will use
     * @var UserRepoInterface
     */
    protected $userRepository;

    /**
     * SessionController constructor.
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
        $this->viewFolder = 'frontend.member';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();

        $filter = [
            'role' => User::USER_ROLE_MEMBER,
        ];
        $users = $this->userRepository->getAllWithPage($filter);

        return $this->_renderView('index', compact('users', 'currentUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->_checkLogin('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberCreateRequest $request)
    {
        $responseFromRepo = $this->userRepository->createItem($request->all());
        if($responseFromRepo['error']){
            return redirect()->action('MembersController@create')
                ->withErrors([$responseFromRepo['message']])
                ->withInput($request->all());

        } else {
            return redirect()->action('SessionsController@create');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentUser = Auth::user();
        $user = $this->userRepository->getDetail($id);
        return $this->_renderView('detail', compact('user', 'currentUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentUser = Auth::user();

        if($currentUser->id != $id) {
            return $this->_redirectWithAction('ClientsController','index');

        }
        $user = $this->userRepository->getDetail($id);
        return $this->_renderView('edit', compact('user', 'currentUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberUpdateRequest $request, $id)
    {
        $rawData = $request->all();
        $responseFromRepository = $this->userRepository->updateItem($id, $rawData);
        if($responseFromRepository['error']){
            return $this->_redirectWithAction('MembersController' ,'edit', $rawData, [$responseFromRepository['message']]);

        } else {
            return $this->_redirectWithAction('ClientsController','index');

        }
    }
}
