@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => session('flash_notification.title'),
            'body'       => session('flash_notification.message')
        ])
    @else
        <div class="alert alert-{{ session('flash_notification.level') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @if(session('flash_notification.level') =='danger')
                <h4><i class="icon fa fa-ban"></i> 提示！</h4>
            @elseif(session('flash_notification.level') =='info')
                <h4><i class="icon fa fa-info"></i> 提示！</h4>
            @elseif(session('flash_notification.level') =='warning')
                <h4><i class="icon fa fa-warning"></i> 提示！</h4>
            @elseif(session('flash_notification.level') =='success')
                <h4><i class="icon fa fa-check"></i> 提示！</h4>
            @endif
            {!! session('flash_notification.message') !!}
        </div>
    @endif
@endif
