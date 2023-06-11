<!-- User List -->
<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </td>
            </tr>
        </tbody>
    </table>

    <?php print_r($user_list); ?>
</div>