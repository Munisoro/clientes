@extends('layouts.adminlte.guest')
@section('body-class', 'login-page')

@section('content')    
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <div class="card-body">
      <form id="form" method="POST">
        <div class="input-group mb-3">
          <input id="email" name="email" type="email" class="form-control" placeholder="{{ __('Email Address') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <button id="submit" type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
        <strong id="msg" class="text-center form-text" style="display: none"></strong>
    </form>
    
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  $(() => {

    $('#form').submit(e => {
      e.preventDefault()

      const email = $('#email').val(), password = $('#password').val(), $msg = $('#msg')

      
      $('#email,#password').removeClass('is-warning is-invalid')
      
      // Validaciones
      if ( email === '' ) $('#email').addClass('is-warning')
      if ( password === '' ) $('#password').addClass('is-warning')
      if ( email === '' || password === '' ) {
        $msg.addClass('text-warning').text('Ingrese los campos.').slideDown()
        return
      } else $msg.slideUp(200, () => $msg.text('').removeClass('text-warning text-danger'))

      $('#submit').html(
        '<i class="fa fa-spinner fa-spin"></i> <span>Iniciar Sesión</span>'
      )[0].disabled = true

      // Petición ajax
      $.ajax({
        url: '', type: 'POST', dataType: 'json', data: { email,password }
      }).fail(resp => {
        // Cuando hay un error en la validación laravel devuelve un status 422
        if (resp.status === 422) {
          $msg.text(resp.responseJSON['errors']['email'][0]).addClass('text-danger').slideDown()
        } else {
          $msg.text('Ocurrió un error inesperado..').addClass('text-danger').slideDown()
        }
      }).done(resp => {
        location.href = '{{route('home')}}'
      }).always(() => {
        $('#submit').html(
          'Iniciar Sesión'
        )[0].disabled = false
      })
    })
  })
</script>
@endsection