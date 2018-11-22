<div class="form-group row">
    <label for="stage_id" class="col-2 col-form-label text-right">Stage</label>
    <div class="col-4">
        <select id="stage_id" name="stage_id" class="form-control">
            @foreach($stages as $stage)
                <option value="{{$stage->id}}">{{$stage->development}}</option>
            @endforeach
        </select>
    </div>
</div>