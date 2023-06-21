
@props(['type' => 'info'])

@php
    switch ($type) {
        case 'info':
            $clases = "alert-info";
            break;

        case 'danger':
            $clases = "alert-danger";
            break;

        case 'success':
            $clases = "alert-success";
            break;

        case 'warning':
            $clases = "alert-warning";
            break;

        case 'primery':
            $clases = "alert-primary";
            break;

        case 'secundary':
            $clases = "alert-secondary";
            break;

        case 'dark':
            $clases = "alert-dark";
            break;

        case 'light':
            $clases = "alert-light";
            break;

        default:
            $clases = "alert-info";
            break;
    }
@endphp

<article {{$attributes->merge(['class' => "border-l-4 p-4 alert $clases", 'role' => "alert"])}} >
    <h1 class="font-bold">{{  $title }}</h1>
    {{  $slot }}
</article>
