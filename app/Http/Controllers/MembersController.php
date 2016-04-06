<?php
namespace App\Http\Controllers;

use App\Http\Requests\MemberCreateRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Repositories\Relationship\RelationshipRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\User;
use App\Http\Requests;

class MembersController extends CommonsController
{
    /**
     * object repository we will use
     * @var UserRepoInterface
     */
    protected $userRepository;
    protected $relationshipRepository;

    /**
     * SessionController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository, RelationshipRepositoryInterface $relationshipRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
        $this->relationshipRepository = $relationshipRepository;
        $this->viewFolder = 'frontend.member';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = $this->currentUser;

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
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberCreateRequest $request)
    {
        $responseFromRepository = $this->userRepository->createItem($request->all());
        if ($responseFromRepository['error']) {
            return $this->_redirectWithAction('MembersController@create', $request->all(), [$responseFromRepository['message']]);

        } else {
            return $this->_redirectWithAction('SessionsController', 'create');

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
        $currentUser = $this->currentUser;
        $currentUser->relationship_id = 0;

        foreach ($currentUser->follower as $relation) {
            if ($relation->following_id == $id) {
                $currentUser->relationship_id = $relation->id;
                break;
            }
        }

        $user = $this->userRepository->getDetail($id);
        return $this->_renderView('detail', compact('user', 'currentUser', 'listMemberCurrentUserFollow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentUser = $this->currentUser;
        if ($currentUser->id != $id) {
            return $this->_redirectWithAction('ClientsController', 'index');

        }
        $user = $this->userRepository->getDetail($id);
        return $this->_renderView('edit', compact('user', 'currentUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberUpdateRequest $request, $id)
    {
        $rawData = $request->all();
        $responseFromRepository = $this->userRepository->updateItem($id, $rawData);
        if ($responseFromRepository['error']) {
            return back()->withErrors([$responseFromRepository['message']])->withInput($rawData);

        }
        return $this->_redirectWithAction('ClientsController','index');
    }
}
