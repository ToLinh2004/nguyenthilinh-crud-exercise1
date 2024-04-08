<form action="" method='post'>
@csrf
<label for="">Student name</label>
<input type="text" name="nameStudent" >
@error('nameStudent')
<span style="color: red">{{$message}}</span>
@enderror
<label for="">Phone</label>
<input type="text" name="phone" >
@error('phone')
<span style="color: red">{{$message}}</span>
@enderror
<button type="submit">Submit</button>
</form>
