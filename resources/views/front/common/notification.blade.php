{{-- resources/views/front/common/notification.blade.php --}}

<div class="notificationPop winScrollStop">
    <div class="notificationBlock">
        <h4>Notifications</h4>
        <a onClick="closeonotificationPopUp()"><img src="{{ asset('front/images/cross.svg') }}" alt="" /></a>

        @if ($notifications->isEmpty())
            <p>No notifications found.</p>
        @else
            @foreach ($notifications as $notification)
                <div class="notificationitem">
                    <div class="notiicon">
                        <img src="{{ asset('front/images/flat_offer.svg') }}" />
                    </div>
                    <div>
                        <h4>{{ $notification->data['title'] ?? 'Notification Title' }}</h4>
                        <p>{{ $notification->data['message'] ?? 'Notification message here.' }}</p>
                    </div>
                    <a href="#;" class="notidelete">
                        <img src="{{ asset('front/images/delete.svg') }}" />
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>