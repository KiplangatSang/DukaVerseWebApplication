@extends('Layouts.houseslayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 pt-3">
                  <img src="/storage/likebtn.jpg" class=" w-100" >
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class = "pr-3">
                            <button><img src="/storage/likebtn.jpg" alt="like" height="10" width="20"><a href=""></button>
                            <img src="/storage/likebtn.jpg" alt="like" style="max-width:60px" class="rounded-circle w-100">
                        </div>

                     <div>
                      <div class="font-weight-bold d-flex"> <a href="/stk"><span class="text-dark">owner</span></a>

                     <button><img src="/storage/likebtn.jpg" alt="House" height="10" width="20"><a href=""></a></follow-button>
                      </div>
                     </div>
                    </div>

                   <p> <a href="/stk"><span class="text-dark"> Owner</span></a></p>
               </div>
        </div>
    </div>

@endsection
