<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\user;
use App\Http\Requests\newTaskRequest;
use App\Http\Requests\newUserRequest;
use App\Http\Requests\loginRequest;

class TodoController extends Controller
{
    /** 
     * ログイン画面表示
     * @return view
    */ 
    public function showLoginPage() {
        return view('login/login');
    }

    /** 
     * ログイン処理
     * @param App\Http\Requests\loginRequest
     * @return redirect
    */ 
    public function exeLogin(loginRequest $request) {
        //idとパスワードを検索
        $loginID=$request['loginID'];
        $loginPassword=$request['loginPassword'];

        // パスワードがあっているかの確認
        \DB::beginTransaction();
        try {
            //登録タスク
            $result=user::where('loginID',$loginID)->get();
            \DB::commit();

            if($result[0]['loginPassword']==$loginPassword) {
                //パスワードが一致したらホームへ
                //sessionにidを追加
                session()->put('loginID', $request['loginID']);

                return redirect(route('home'));
            } else {
                //パスワードが一致しなければエラーメッセージを作成
                \Session::flash('msg', 'パスワードかログインIDが間違っています');
                return redirect(route('loginPage'));

            }
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

    }

    /** 
     * 新規登録画面表示
     * @return view
    */ 
    public function showAddUserPage() {
        return view('login/add');
    }

    /** 
     * 新規ユーザー登録処理
     * @param App\Http\Requests\newUserRequest
     * @return redirect
    */ 
    public function exeAddUser(newUserRequest $request) {
        //フォーム内容からinputを作成
        $input=[
            'loginID'=>$request->input('loginID') ,
            'loginPassword'=>$request->input('loginPassword')
        ];

        //登録処理
        \DB::beginTransaction();
        try {
            user::create($input);
            \DB::commit();
            //完了後ろグイン画面へ
            \Session::flash('msg-complete','登録できました');
            return redirect(route('loginPage'));
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /** 
     * ホーム画面へ
     * @return view
    */ 
    public function showHome() {
        return view('home');
    }

    /** 
     * メイン表示
     * @return view
    */ 
    public function showMain() {
        $loginID = session()->get('loginID');
        //全てのタスクを取得
        $tasks = task::where('loginID',$loginID)->get();
        return view('main',['tasks'=>$tasks]);
    }

    /** 
     * タスクを追加
     * @param App\Http\Requests\newTaskRequest
     * @return redirect
    */ 
    public function exeAddTask(newTaskRequest $request) {
        //タスクを取得
        $input=[
            'loginID'=>session()->get('loginID') ,
            'task'=>$request->input('newTask')
        ];

        \DB::beginTransaction();
        try {
            //登録処理
            task::create($input);
            \DB::commit();
            return redirect(route('home'));
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /** 
     * 編集画面を表示
     * @param int $id
     * @return view
    */ 
    public function showEditPage($id) {
        //タスクを取得
        $task = Task::find($id);
        return view('edit',['task'=>$task]);
    }

    /** 
     * 編集されたタスクを更新
     * @param App\Http\Requests\newTaskRequest
     * @param int $id
     * @return redirect
    */ 
    public function exeUpdateTask(newTaskRequest $request,$id) {
        //変更されたタスクを受け取る
        $newTask = $request['newTask'];

        //更新する
        \DB::beginTransaction();
        try {
            //更新処理
            $task = task::find($id);
            $task->fill(['task'=>$newTask]);
            $task->save();
            \DB::commit();
            \Session::flash('msg','更新しました');
            return redirect(route('home'));
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /** 
     * タスクを消去
     * @param int $id
     * @return redirect
    */ 
    public function exeDeleteTask($id) {
        //IDからタスクを取得
        $task = task::find($id);

        //消去
        \DB::beginTransaction();
        try {
            //消去処理
            task::where('id',$id)->delete();
            \DB::commit();
            return redirect(route('home'));
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /** 
     * ログアウト処理
     * @return redirect
    */ 
    public function exelogOut() {
        //セッションを消去して
        session()->flush();

        //ログイン画面に飛ばす
        return redirect(route('loginPage'));
    }

    /** 
     * メニュー画面を表示
     * @return view
    */ 
    public function showMenyu() {
        //ログインIDを送る
        $loginID = session()->get('loginID');
        return view('menyu',['loginID'=>$loginID]);
    }
}
