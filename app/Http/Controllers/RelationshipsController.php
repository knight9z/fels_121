<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RelationshipCreateRequest;
use App\Repositories\Relationship\RelationshipRepositoryInterface;
use Illuminate\Support\Facades\Session;

class RelationshipsController extends CommonsController
{
    protected $relationshipRepository;

    public function __construct(RelationshipRepositoryInterface $relationshipRepository)
    {
        parent::__construct();
        $this->relationshipRepository = $relationshipRepository;
    }

    /**
     * @param RelationshipCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RelationshipCreateRequest $request)
    {
        $rawData = $request->only('follower_id', 'following_id');
        $responseFromRepository = $this->relationshipRepository->createItem($rawData);

        if ($responseFromRepository['error']) {
            return back()->withErrors([$responseFromRepository['message']]);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));

            return back();
        }
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $responseFromRepository = $this->relationshipRepository->deleteItem($id);

        if ($responseFromRepository['error']) {
            return back()->withErrors([$responseFromRepository['message']]);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));

            return back();
        }
    }
}
