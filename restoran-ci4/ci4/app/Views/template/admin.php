<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Layout</title>
</head>

<body>
    <nav>

        <ul>
            <a href="<?= base_url() ?>/admin/kategori">
                <li>Select</li>
            </a>
            <a href="<?= base_url() ?>/admin/kategori/create">
                <li>Insert</li>
            </a>
            <a href="<?= base_url() ?> /admin/kategori/find/6">
                <li>Update</li>
            </a>
        </ul>


    </nav>

    <?= $this->renderSection('content') ?>
</body>

</html>