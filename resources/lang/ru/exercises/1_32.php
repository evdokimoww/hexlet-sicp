<?php

return [
    'title' => 'Накопление',
    'description' => [
        '1' =>
        "а. Покажите, что sum и product (упражнение 1.31) являются частными случаями еще более общего понятия, называемого накопление (accumulation), " .
        "которое комбинирует множество термов с помощью некоторой общей функции накопления",
        '2' =>
        "Accumulate принимает в качестве аргументов те же описания термов и диапазона, что и sum с product, а еще процедуру combiner (двух аргументов), " .
        "которая указывает, как нужно присоединить текущий терм к результату накопления предыдущих, и null-value, базовое значение, которое нужно использовать, " .
        "когда термы закончатся. Напишите accumulate и покажите, как и sum, и product можно определить в виде простых вызовов accumulate",
        '3' =>
        "б. Если Ваша процедура accumulate порождает рекурсивный процесс, перепишите ее так, чтобы она порождала итеративный. " .
        "Если она порождает итеративный процесс, перепишите ее так, чтобы она порождала рекурсивный."
    ]
];
