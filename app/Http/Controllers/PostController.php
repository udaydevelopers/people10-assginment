<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Mail;
use Mailgun\Mailgun;
use Carbon\Carbon;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function sendemail()
    {
        $data = array('name'=>"Uday Kant");
        Mail::send('welcome', $data, function($message) {
        $message->to('udaykantpandey@yahoo.co.in', 'DEMO MAIL')->subject('Mailgun message test on 26june for demo');
        $message->from('uday.pandey@ncirm.com','uday kant pandey');
        });
    }

    // public function getmailgunmsg(){

    //     $mgClient = Mailgun::create(env('MAILGUN_SECRET'), 'https://api.mailgun.net/v3/sandbox0884e707b3a0485db85b6ab59f3c9bbe.mailgun.org');
    //     $domain      = env('MAILGUN_DOMAIN');
    //     $params = array(
    //         'from'    => 'Excited User <postmaster@sandbox0884e707b3a0485db85b6ab59f3c9bbe.mailgun.org>',
    //         'to'      => 'udaykantpandey@yahoo.co.in',
    //         'subject' => 'Hello',
    //         'text'    => 'Testing some Mailgun awesomness!'
    //       );
          
    //       # Make the call to the client.
    //       $result = $mgClient->messages()->send($domain, $params);

    //     dd($result);

    // }

    public function getmailgunmsg(){
        
        $mgClient = Mailgun::create(env('MAILGUN_SECRET'), 'https://api.mailgun.net/v3/sandbox0884e707b3a0485db85b6ab59f3c9bbe.mailgun.org');
        $domain      = env('MAILGUN_DOMAIN');
        $queryString = array(
            'begin'        => 'Wed, 1 Jan 2020 09:00:00 -0000',
            'ascending'    => 'yes',
            'limit'        =>  25,
            'pretty'       => 'yes',
            'recipient'    => 'udaykantpandey@yahoo.co.in',
            // 'event'         => 'accepted'
        );
        
        # Issue the call to the client.
        $results = $mgClient->events()->get($domain, $queryString);
        //dd($results);
        //echo '<pre>';
        $messageList = array();
        foreach($results->getItems() as $k=>$items){ 
            $messageList[$k]['id'] = $items->getId();
            $messageList[$k]['message'] = $items->getMessage();
            $messageList[$k]['recipient'] = $items->getRecipient();
            $messageList[$k]['event_date'] = Carbon::createFromDate("Y",$items->getTimestamp());
            $messageList[$k]['event'] = $items->getEvent();
            $messageList[$k]['msg_url'] = $this->getmsgdetails($items->getStorage());
        }
        //dd($messageList);
        return view('posts.mailgun',['messages' => $messageList]);
    }

    public function getmsgdetails($urlArr=null)
    {
        $url = $urlArr['url'];
        //$url = 'https://sw.api.mailgun.net/v3/domains/sandbox0884e707b3a0485db85b6ab59f3c9bbe.mailgun.org/messages/AgEFVWG8h1wy0dYD_aFBj5YqOfnyZwJYZA==';
        $mgClient = Mailgun::create(env('MAILGUN_SECRET'), 'https://api.mailgun.net/v3/sandbox0884e707b3a0485db85b6ab59f3c9bbe.mailgun.org');
        $domain      = env('MAILGUN_DOMAIN');

        $results = $mgClient->messages()->show($url); 
        $msg = array();
        $msg['recipients'] = $results->getRecipients();
        $msg['from'] = $results->getFrom();
        $msg['subject'] = $results->getSubject();
        $msg['message'] = $results->getBodyPlain();
        return $msg;
    }

}
