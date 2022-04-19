 <div class="form-group">
     @isset($label)
         @if($label)
             <label for="{{ $id }}">{{ $label }}</label>
         @endif
     @endisset
        <input type="{{ $type }}" name="{{ $name ?? '' }}" class="form-control {{ $class ?: '' }} @error($name) is-invalid @else @enderror" @isset($id) id="{{ $id ?: ''}}" @endisset @isset($placeholder) placeholder="{{ $placeholder ?: '' }}" @endisset  value="{{ $value }}">
 </div>
 @error($name)
 <span class="text-danger">{{ $message }}</span>
 @enderror
