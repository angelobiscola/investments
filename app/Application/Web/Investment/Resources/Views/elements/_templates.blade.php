@inject('templates',  'App\Domains\Billet\Template')

<select name='billet[template_id]' id="billet[template_id]" class="form-control">

    @foreach($templates->all() as $template)

        <option name="{!! $template->id !!}" value="{!! $template->id !!}">
            {!! $template->name !!}
        </option>

    @endforeach

</select>

