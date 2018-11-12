@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lots by Development</div>

                    <div class="card-body">
                        <div class="row mb-1">
                            <label for="development" class="col-3 col-form-label">Development</label>
                            <div class="col-3">
                                <select class="form-control" name="development">
                                    <option>Bellmere</option>
                                    <option>Cherrybook</option>
                                    <option>Riverparks</option>
                                    <option>Springbrook</option>
                                    <option>The Outlook</option>
                                    <option>The Parks</option>
                                    <option>The Pocket</option>
                                    <option>Vistas North</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="stage" class="col-3 col-form-label">Stage</label>
                            <div class="col-3">
                                <select id="stage" name="stage" class="form-control">
                                    <option>Stage 1</option>
                                    <option>Stage 2</option>
                                    <option>Stage 3</option>
                                    <option>Stage 4</option>
                                    <option>Stage 5</option>
                                    <option>Stage 6</option>
                                    <option>Stage 7</option>
                                    <option>Stage 8</option>
                                    <option>Stage 9</option>
                                    <option>Stage 10</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="lot" class="col-3 col-form-label">Lot</label>
                            <div class="col-3">
                                <select id="lot" name="lot" class="form-control">
                                    <option>Lot 101</option>
                                    <option>Lot 102</option>
                                    <option>Lot 103</option>
                                    <option>Lot 104</option>
                                    <option>Lot 105</option>
                                    <option>Lot 106</option>
                                    <option>Lot 107</option>
                                    <option>Lot 108</option>
                                    <option>Lot 109</option>
                                </select>
                            </div>
                        </div>

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Disabled</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
