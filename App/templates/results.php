<h1>Результаты поиска</h1>

<?php if ($results): ?>
    <table class="table">
        <tr>
            <th>Адрес</th>
            <th>Искомые элементы</th>
            <th>Найдено</th>
        </tr>
        <?php foreach ($results as $result): ?>
            <tr>
                <td>
                    <a href="#" class="show-results"><?= $result->url; ?></a>
                </td>
                <td>
                    <?php if ($result->type == 'img'): ?>
                        Изображения
                    <?php elseif ($result->type == 'a'): ?>
                        Ссылки
                    <?php elseif ($result->type == 'text'): ?>
                        Текст (<?= $result->txt; ?>)
                    <?php endif; ?>
                </td>
                <td><?= $result->count; ?></td>
            </tr>
            <tr class="results" style="display: none;">
                <td colspan="3">
                    <p>
                        <b>Найденные элементы:</b>
                    </p>
                    <?= htmlspecialchars($result->elements); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Пока нет данных</p>
<?php endif; ?>