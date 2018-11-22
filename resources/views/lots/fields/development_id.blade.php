<div class="form-group row">
    <label for="development_id" class="col-2 col-form-label text-right">Development</label>
    <div class="col-4">
        <select id="development_id" name="development_id" class="form-control">
            @foreach($developments as $development)
                <option value="{{$development->id}}">{{$development->development}}</option>
            @endforeach
        </select>
    </div>
</div>