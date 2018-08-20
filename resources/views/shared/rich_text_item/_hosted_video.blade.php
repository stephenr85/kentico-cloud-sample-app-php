@php($host = $item->videoHost[0]->codename)

@if($host == 'vimeo')
    <iframe class="hosted-video__wrapper"
            src="https://player.vimeo.com/video/{{ $item->videoId }}?title=0&byline=0&portrait=0"
            width="640"
            height="360"
            frameborder="0"
            webkitallowfullscreen
            mozallowfullscreen
            allowfullscreen
            >
    </iframe>
@elseif($host == 'youtube')
    <iframe class="hosted-video__wrapper"
            width="560"
            height="315"
            src="https://www.youtube.com/embed/{{ $item->videoId }}"
            frameborder="0"
            allowfullscreen
            >
    </iframe>
@endif