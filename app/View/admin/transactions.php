<?php
require_once '../controllers/TransactionController.php';
$transactions = $controller->getTransactions();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Transactions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="p-8">
    <h1 class="text-2xl font-bold mb-4">Liste des Transactions</h1>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Expéditeur</th>
                <th class="py-2 px-4 border-b">Conducteur</th>
                <th class="py-2 px-4 border-b">Montant</th>
                <th class="py-2 px-4 border-b">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td class="py-2 px-4 border-b"><?= htmlspecialchars($transaction['expediteur_id']) ?></td>
                <td class="py-2 px-4 border-b"><?= htmlspecialchars($transaction['conducteur_id']) ?></td>
                <td class="py-2 px-4 border-b"><?= htmlspecialchars($transaction['montant']) ?> DH</td>
                <td class="py-2 px-4 border-b"><?= $transaction['date_transaction'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
