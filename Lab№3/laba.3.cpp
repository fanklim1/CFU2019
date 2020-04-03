// laba.3.cpp : Этот файл содержит функцию "main". Здесь начинается и заканчивается выполнение программы.
//

#include <iostream>
#include <ostream>
#include <cmath>

#include "libbmp.h"
using namespace std;
enum col {
    RED,
    GREEN,
    BLUE
};

char to_char(bool arr[8]) {
    int sum = 0;
    for (int i = 0; i < 8; i++) {
        sum += pow(2, i) * arr[i];
    }
    char res = sum;
    return res;
}

bool get_bit(int x, int y, BmpImg img) {
    static int len = 0;
    int color_num;
    static col color = RED;
    static bool temp[8] = {};

    switch (color) {
    case RED:
        color_num = int(img.red_at(x, y)) % 2;
        break;
    case GREEN:
        color_num = int(img.green_at(x, y)) % 2;
        break;
    case BLUE:
        color_num = int(img.blue_at(x, y)) % 2;
        break;
    }
    temp[7 - len] = color_num;
    len++;

    if (len == 8) {
        char temp_char = to_char(temp);
        if (temp_char == char(0)) {
            cout << endl;
            len = 0;
            color = static_cast<col> ((color + 1) % 3);
            return false;
        }
        else {
            cout << temp_char;
            len = 0;
            color = static_cast<col> ((color + 1) % 3);
            return true;
        }
    }
    color = static_cast<col> ((color + 1) % 3);
    return true;
}

int main() {
    BmpImg img; img.read("pic3.bmp");

    const int x_max = 600, y_max = 650;
    for (int x = 0; x < x_max; x++) {
        for (int y = 0; y < y_max; y++) {
            if (!get_bit(x, y, img)) return 0;
            if (!get_bit(x, y, img)) return 0;
            if (!get_bit(x, y, img)) return 0;
        }
    }
    return 0;
}

// Запуск программы: CTRL+F5 или меню "Отладка" > "Запуск без отладки"
// Отладка программы: F5 или меню "Отладка" > "Запустить отладку"

// Советы по началу работы 
//   1. В окне обозревателя решений можно добавлять файлы и управлять ими.
//   2. В окне Team Explorer можно подключиться к системе управления версиями.
//   3. В окне "Выходные данные" можно просматривать выходные данные сборки и другие сообщения.
//   4. В окне "Список ошибок" можно просматривать ошибки.
//   5. Последовательно выберите пункты меню "Проект" > "Добавить новый элемент", чтобы создать файлы кода, или "Проект" > "Добавить существующий элемент", чтобы добавить в проект существующие файлы кода.
//   6. Чтобы снова открыть этот проект позже, выберите пункты меню "Файл" > "Открыть" > "Проект" и выберите SLN-файл.
