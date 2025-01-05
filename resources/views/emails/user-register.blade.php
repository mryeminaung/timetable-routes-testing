@props(['user'])

<div class="p-3">
    Hello Admin, A new user has just registered on your platform.
    Here are the details:

    **Name:** {{ $user->name }}

    **Email:** {{ $user->email }}

    {{-- **Registration Date:** {{ $user->created_at->format('F d, Y H:i') }} --}}
</div>
