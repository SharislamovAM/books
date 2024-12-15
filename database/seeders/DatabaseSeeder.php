<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use Database\Factories\BookFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $authors = [
            'Стив Макконнелл',
            'Михаил Фленов',
            'Мэтт Стаффер',
            'Дэвид Скляр',
            'Адам Трахтенберг',
            'Бэрон Шварц',
            'Вадим Ткаченко',
            'Петр Зайцев',
            'Ральф Джонсон',
            'Джон Влиссидес',
            'Ричард Хелм',
            'Эрих Гаммарт',
        ];

        $books = [
            ['title' => 'Совершенный код', 'authors' => [$authors[0]]],
            ['title' => 'PHP глазами хакера', 'authors' => [$authors[1]]],
            ['title' => 'Laravel. Полное руководство', 'authors' => [$authors[2]]],
            ['title' => 'PHP. Рецепты программирования', 'authors' => [$authors[3], $authors[4]]],
            ['title' => 'MySQL по максимуму', 'authors' => [$authors[5], $authors[6], $authors[7]]],
            ['title' => 'Паттерны объектно-ориентированного проектирования', 'authors' => [$authors[8], $authors[9], $authors[10], $authors[11]]],
        ];

        foreach ($authors as $author) {
            Author::create(['name' => $author]);
        }

        foreach ($books as $book) {
            $bookModel = Book::create(['title' => $book['title']]);
            $bookModel->authors()->attach(array_map(function ($author) {
                return Author::where('name', $author)->first()->id;
            }, $book['authors']));
        }
    }
}
