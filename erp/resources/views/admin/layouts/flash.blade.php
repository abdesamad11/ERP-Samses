

@if(session('sucess_message'))

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading"></h4>

  {{session('success_message')}}

  <p></p>
  <p class="mb-0"></p>
</div>

@endif
