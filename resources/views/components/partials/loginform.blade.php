
     <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
          @csrf
          <div class="row align-items-center">
            <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
              <input name="name" class="form-control form-control-sm input-dark" type="text" placeholder="Username" autocomplete="off" />
            </div>
            <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
              <input name="password" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
            </div>
            <div class="col-md-auto">
              <button class="btn btn-primary btn-sm">log In</button>
              
            <a href="{{ Route('register') }}" class="btn btn-success btn-sm ml-5" >Register</a>

            
            </div>
          </div>
        </form>
