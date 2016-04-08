<?php

namespace App\Http\Controllers;

use App\Repositories\Activity\ActivityRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\LessonWord\LessonWordRepositoryInterface;
use App\Repositories\Relationship\RelationshipRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests;
use App\Repositories\UserLesson\UserLessonRepositoryInterface;
use App\Repositories\Word\WordRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ClientsController extends CommonsController
{
    protected $categoryRepository;
    protected $lessonRepository;
    protected $activityRepository;
    protected $relationShipRepository;
    protected $wordRepository;
    protected $userLessonRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        LessonRepositoryInterface $lessonRepository,
        ActivityRepositoryInterface $activityRepository,
        RelationshipRepositoryInterface $relationShipRepository,
        WordRepositoryInterface $wordRepository,
        UserLessonRepositoryInterface $userLessonRepository
    )
    {
        parent::__construct();
        $this->viewFolder = 'frontend';
        $this->categoryRepository = $categoryRepository;
        $this->lessonRepository = $lessonRepository;
        $this->activityRepository = $activityRepository;
        $this->relationShipRepository = $relationShipRepository;
        $this->wordRepository = $wordRepository;
        $this->userLessonRepository = $userLessonRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        $filterRelationship = ['follower_id' => $currentUser->id];
        $listFollowingId = $this->relationShipRepository->getListUser($filterRelationship);
        $filterActivity = ['user_id' => $currentUser->id, 'following_id' => $listFollowingId];
        $activities = $this->activityRepository->getAllWithPage($filterActivity);


        return $this->_renderView('index', compact('currentUser', 'activities'));
    }

    public function category()
    {
        $currentUser = Auth::user();
        $categories = $this->categoryRepository->getAllWithPage($this->input);
        return $this->_renderView('category.index', compact('categories', 'currentUser'));
    }

    public function lesson($categoryId)
    {
        $currentUser = Auth::user();
        $lessons = $this->lessonRepository->getAllWithPage(['category_id' => $categoryId]);
        return $this->_renderView('lesson.index', compact('currentUser', 'lessons'));
    }

    public function word()
    {
        $currentUser = Auth::user();
        $categories = $this->categoryRepository->getList([]);
        $wordFilter = $this->input;
        $isReadWords = [
            config('constants.all_word') => trans('frontend/layout.child.word.all'),
            config('constants.not_learned') => trans('frontend/layout.child.word.not_learned'),
            config('constants.learned') => trans('frontend/layout.child.word.learned'),
        ];

        $oldData = [
            'category_id' => isset($wordFilter['category_id']) ? $wordFilter['category_id'] : 0,
            'is_reader' => isset($wordFilter['is_reader']) ? $wordFilter['is_reader'] : config('constants.all_word'),
        ];

        if (isset($wordFilter)) {
            if (isset($wordFilter['is_reader']) && $wordFilter['is_reader'] != 1) {
                $listWordReaded = $this->userLessonRepository->getListWordCorrectAnswer($currentUser->id);

                if ($wordFilter['is_reader'] == 2) {
                    $wordFilter['whereNotIn'] = ['field' => 'id', 'value' => $listWordReaded];
                } else {
                    $wordFilter['whereIn'] = ['field' => 'id', 'value' => $listWordReaded];
                }
            }
        }

        $words = $this->wordRepository->getAllWithPage($wordFilter);
        $words->setPath('word?category_id=' . $oldData['category_id'] . '&is_reader=' . $oldData['is_reader']);

        return $this->_renderView('word.index', compact('currentUser', 'categories', 'isReadWords', 'words', 'oldData'));
    }


}
