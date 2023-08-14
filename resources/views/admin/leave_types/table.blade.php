<table class="table custom-table mb-0">
    <thead>
        <tr>
            <th>title</th>
            <th>Duration</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $leaveTypes as $type)
        <tr>
            <td>
                <a href="employment.html" class="avatar"><img alt="avatar image"
                        src="assets/img/profiles/img-5.jpg" class="img-fluid"></a>
                <h2><a href="employment.html">{{$type->name}}</a></h2>
            </td>
            <td>{{$type->duration}}</td>

            <td><a href="{{route('types.edit',$type->id)}}" class="btn btn-dark edit_type_btn">Edit</a></td>
            <td><form action="{{route('types.destroy',$type->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger delete_type_btn">Delete</button></form></td>

        </tr>
        @endforeach

    </tbody>
</table>
{!! $leaveTypes->links() !!}


<script>

        

</script>