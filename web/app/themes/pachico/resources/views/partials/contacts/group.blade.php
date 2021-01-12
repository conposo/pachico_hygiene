<section class="card">
    <h1 class="h5 text-uppercase p-2 border-bottom">{!! $group['heading'] !!}</h1>
    <div class="p-2 shadow-sm">
        <p>{!! $group['address'] !!}</p>
        @if($group['template'] == 'Simple')
            @foreach($group['contacts'] as $contact)
                @php
                    $type = explode('@', $contact['row']);
                    if( count($type) == 2)
                    {
                        $type = 'mailto';
                    }
                    else 
                    {
                        $temp_val = str_replace('+', '', $contact['row']);
                        $temp_val = str_replace(' ', '', $temp_val);

                        if( is_numeric($temp_val) )
                        {
                            $type = 'tel';
                        } else {
                            $type = 'string';
                        }
                    }
                    $row = str_replace(' ', '', $contact['row']);
                @endphp
                <p class="mb-0">
                @if( $type != 'string' )
                    <a href="{{$type}}:{!! $row !!}">{!! $contact['row'] !!}</a>
                @else
                    {!! $contact['row'] !!}
                @endif
                </p>
            @endforeach
        @else
            @foreach($group['contacts_complex'] as $row)
                @php
                // dd($row);
                @endphp
                @foreach($row['row'] as $row)
                    <div class="mb-1">
                        <h5 class="mb-0 text-uppercase small" style="opacity:.65">{!! $row['heading'] !!}</h5>
                        @foreach($row['contacts'] as $contact)
                            @php
                                $type = explode('@', $contact['row']);
                                if( count($type) == 2)
                                {
                                    $type = 'mailto';
                                }
                                else 
                                {
                                    $type = 'tel';
                                }
                                $row = str_replace(' ', '', $contact['row']);
                            @endphp
                            <p class="mb-0">
                                @if($contact['row'][0] == '<')
                                <span class="d-block">{!! $contact['row'] !!}</span>
                                @else
                                <a href="{{$type}}:{!! $row !!}">{!! $contact['row'] !!}</a>
                                @endif
                            </p>
                        @endforeach
                    </div>
                @endforeach
            @endforeach
        @endif
    </div>
    
    <div class="g-map">{!! $group['map'] !!}</div>
    <style>
        .g-map iframe { display: block; }
    </style>
</section>