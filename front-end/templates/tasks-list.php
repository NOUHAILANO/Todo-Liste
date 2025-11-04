<!-- ===============================
     Liste des tâches
     =============================== -->
<div class="container mt-5 mb-5">
    <h4 class="mb-3 text-center">Liste des tâches</h4>

    <ul class="list-group shadow-sm">
        <?php if (!empty($taches)): ?>
            <?php foreach ($taches as $task): ?>
                <li class="list-group-item 
            <?= $task['done'] ? 'list-group-item-success' : 'list-group-item-warning' ?>">

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Titre de la tâche -->
                        <span><?= htmlspecialchars($task['title']) ?></span>

                        <!-- Formulaire d’actions -->
                        <form method="POST" class="d-flex gap-2 mb-0">
                            <!-- ID caché de la tâche courante -->
                            <input type="hidden" name="id" value="<?= $task['id'] ?>">

                            <!-- Bouton Toggle -->
                            <button type="submit" name="action" value="toggle" class="btn btn-sm btn-outline-secondary">
                                <?= $task['done'] ? 'Annuler' : 'Terminer' ?>
                            </button>

                            <!-- Bouton Delete -->
                            <button type="submit" name="action" value="delete" class="btn btn-sm btn-outline-danger">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item text-center text-muted">
                Aucune tâche pour le moment.
            </li>
        <?php endif; ?>
    </ul>
</div>