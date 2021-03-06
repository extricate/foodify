<div class="form-group">
    <div class="row justify-content-between">
        <div class="col-md-6 align-self-center">
            <strong>{{ $title or str_replace('_', ' ', ucfirst($setting)) }}:</strong>
        </div>
        <div class="col-md-6">
            <div class="mdc-form-field d-flex float-right">
                <div class="mdc-radio">
                    <input class="mdc-radio__native-control" type="radio" id="{{ $setting }}-1"
                           name="{{ $setting }}"
                           @if(auth()->user()->getSetting($setting)) checked @endif value="1">

                    <div class="mdc-radio__background">
                        <div class="mdc-radio__outer-circle"></div>
                        <div class="mdc-radio__inner-circle"></div>
                    </div>
                </div>
                <label for="{{ $setting }}-1" class="mb-0">{{ $label1 or 'Show' }}</label>
                <div class="mdc-radio">
                    <input class="mdc-radio__native-control" type="radio" id="{{ $setting }}-2"
                           name="{{ $setting }}"
                           @if(!auth()->user()->getSetting($setting)) checked @endif value="0">
                    <div class="mdc-radio__background">
                        <div class="mdc-radio__outer-circle"></div>
                        <div class="mdc-radio__inner-circle"></div>
                    </div>
                </div>
                <label for="{{ $setting }}-2" class="mb-0">{{ $label2 or 'Hide' }}</label>
            </div>
        </div>
    </div>
    <hr>
</div>