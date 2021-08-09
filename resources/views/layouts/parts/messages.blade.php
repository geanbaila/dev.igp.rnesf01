@if( !empty($errors) && $errors->count() > 0)
    
    <div class="hidden" id="toast-component" data-type="warning"
         data-title=""
         data-message="El formulario tiene algunos errores">
        
        
    </div>
@endif

@if( session()->has('saved-correctly') )
    <div class="hidden" id="toast-component" data-type="success"
         data-title=""
         data-message="{{ session()->get('saved-correctly') }}"></div>
@endif
