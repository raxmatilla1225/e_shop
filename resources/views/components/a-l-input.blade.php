 <div class="form-group">
     @isset($label)
         @if($label)
             <label for="{{ $id }}">{{ $label }}</label>
         @endif
     @endisset

        <input type="{{ $type }}" name="{{ $name ?? '' }}" class="form-control {{ $class ?: '' }}" @isset($id) id="{{ $id ?: ''}}" @endisset @isset($placeholder) placeholder="{{ $placeholder ?: '' }}" @endisset>
 </div>
