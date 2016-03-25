<?php

namespace Socieboy\Forum\Controllers;

use \App\Http\Controllers\Controller;
use App\Topic;
use Illuminate\Http\Request;
use Socieboy\Forum\Entities\Conversations\ConversationRepo;

class ForumController extends Controller
{

    /**
     * @var ConversationRepo
     */
    protected $conversationRepo;

    /**
     * @param ConversationRepo $conversationRepo
     */
    function __construct(ConversationRepo $conversationRepo)
    {
        $this->conversationRepo = $conversationRepo;
    }

    /**
     * Display the main page of the forum.
     * All conversations are listed.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $conversations = $this->conversationRepo->latest()->paginate(10);
        $topic = Topic::all();
            
            
        return view('Forum::index', compact('conversations','topic'));
    }

    /**
     * Display the main page of the forum.
     * All conversations are listed.
     *
     * @param $topic_id
     * @return \Illuminate\View\View
     */
    public function topic($topic_id)
    {
        $conversations = $this->conversationRepo->topic($topic_id);
        $topic = Topic::all();

        return view('Forum::index', compact('conversations','topic'));
    }


    /**
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $conversations = $this->conversationRepo->search($request->all());

        return view('Forum::index', compact('conversations'));
    }

    public function storeTopic(Request $request){
        $asistente = Topic::create($request->all());
        return redirect()->route('forum');


    }



} 