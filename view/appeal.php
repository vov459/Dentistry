<?php
namespace View;
use View\ViewInterface;
class AppealView implements ViewInterface{

    public function render(): void
    {
        // TODO: Implement render() method.
    }
}
?>

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Город</th>
        <th scope="col1">Улица</th>
        <th scope="col2">Дом</th>
        <th scope="col2">Индекс</th>
        <th scope="col3" width="120px"><a href="/bd/add/address" class="btn btn-success">Добавить</a></th>
    </tr>
    </thead>
    <tbody>
    <?php
    /* @var $row Address */
    foreach ($data as $row){
        ?>
        <tr>
            <td><?= $row->getCity() ?></td>
            <td><?= $row->getStreet() ?></td>
            <td><?= $row->getBuild() ?></td>
            <td><?= $row->getZipCode() ?></td>
            <td><a href="/bd/remove/address?id=<?=$row->getId();?>" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg></a>
                <a href="/bd/edit/address?id=<?=$row->getId();?>" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg></a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
