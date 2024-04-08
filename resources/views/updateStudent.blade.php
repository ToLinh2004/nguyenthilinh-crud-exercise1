<form action="{{route('postUpdateStudent')}}" method='post'>
    @csrf
    <label for="">Student name</label>
    <input type="text" name="nameStudent" value="{{old('nameStudent') ?? $studentDetail[0]->name}}">
    @error('nameStudent')
    <span style="color: red">{{$message}}</span>
    @enderror
    <label for="">Phone</label>
    <input type="text" name="phone" value="{{old('phone') ?? $studentDetail[0]->phone}}">
    @error('phone')
    <span style="color: red">{{$message}}</span>
    @enderror
    <button type="submit">Submit</button>
    </form>
    