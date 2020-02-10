<?php $this->layout('layouts/app', ['tab' => 'users']) ?>


<h3>All Users(<?= count($user_list) ?>)</h3>
<br>
<table class="table text-center">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">username</th>
            <th scope="col">email</th>
            <th scope="col">created date</th>
            <th scope="col">stories</th>
            <th scope="col">views</th>
            <th scope="col">gifts</th>
            <th scope="col">status</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1 ?>
        <?php foreach ($user_list as $user) : ?>
            <tr class="tr-link" onclick="window.location='/profile/user/<?= $user['user_info']->username ?>';">
                <th scope="row"><?= $i++ ?></th>
                <td><?= $user['user_info']->username ?></td>
                <td><?= $user['user_info']->email ?></td>
                <td><?= $user['user_info']->created_date ?></td>
                <td><?= $user['total_post'] ?></td>
                <td><?= $user['total_view'] ?></td>
                <td><?= $user['point'] ?></td>
                <?php if ($user['user_info']->ban == 0) : ?>
                    <td style="color:green">ACTIVE</td>
                <?php else : ?>
                    <td style="color:red">BANNED</td>
                <?php endif; ?>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>