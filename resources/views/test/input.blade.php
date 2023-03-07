@extends('test.layout')


{{-- メインコンテンツ --}}
@section('contets')
        email：{{ $datum['email'] }}<br>
        パスワード：{{ $datum['password'] }}<br>
     /**
     * 入力を受け取る
     * 
     * @return \Illuminate\View\View
     */
    public function input(TestPostRequest $request)
    {
        // validate済

        // データの取得
        $validatedData = $request->validated();

        //
        //var_dump($validatedData); exit;
        
        return view('test.input', ['datum' => $validatedData]);
    }
@endsection
