<article {{$attributes->merge(['class' => "alert border-l-4 p-4 $clases", 'role' => "alert"])}} >
    <h1 class="font-bold">{{ $title }}</h1>
    {{  $slot }}
</article>
