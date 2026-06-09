<section>
    <h2>Form Pendaftaran</h2>

    <?php if (!empty($errors)): ?>
        <?php foreach ($errors as $error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success">Pendaftaran berhasil diproses dan disimpan ke session.</div>
    <?php endif; ?>

    <?php include 'frm_pendaftaran.php'; ?>
</section>

<?php
include 'koneksi.php';

$full_name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone_number = trim($_POST['phone_number'] ?? '');
$course_id = (int) ($_POST['course_id'] ?? 0);
$participant_count = (int) ($_POST['participant_count'] ?? 0);

$sql = "insert into registrations (full_name, email, phone_number, course_id, participant_count) values(
'$full_name',
'$email',
'$phone_number',
'$course_id',
'$participant_count')";
$query = mysqli_query($conn, $sql);

header("Location: index.php");
exit;

?>