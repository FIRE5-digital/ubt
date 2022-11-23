<div class="full-header-search">
    <div class="search-form">
        <form class="form" action="/search">
            <input type="hidden" id="search-type" name="search-type" value="Car">
            <div class="form-row">
                <div class="form-group">
                    <label class="visuallyhidden" for="make">Make</label>
                    {!! Form::select('make', [''=>'Any Make']+(@$makes?:[]), @\Request::input('make'), ['class'=>'form-control select-css']) !!}
                </div>
                <div class="form-group">
                    <label class="visuallyhidden" for="model">Model</label>
                    {!! Form::select('model', [''=>'Any Model']+(@$models?:[]), @\Request::input('model'), ['class'=>'form-control select-css']) !!}
                </div>
                <div class="form-group">
                    <label class="visuallyhidden" for="budget">Budget</label>
                    {!! Form::select('budget', [
                        ''=>'Any Budget',
                        '0-150' => 'upto £150 pm',
                        '150-200' => '£150-£200 pm',
                        '200-250' => '£200-£250 pm',
                        '250-300' => '£250-£300 pm',
                        '300-350' => '£300-£350 pm',
                        '350-400' => '£350-£400 pm',
                        '400-500' => '£400-£500 pm',
                        '500+' => 'Above £500 pm'
                    ], @\Request::input('budget'), ['class'=>'form-control select-css']) !!}
                </div>

                <div class="form-group">
                    <button class="button-accent">
                    Search
                    </button>
                </div>
            </div><!-- form-row-->

                <div class="form-group">
                    <a class="advanced-link" href="/search?show-search-bar=true">Advanced Search</a>
                </div>

        </form>
    </div>
</div>
