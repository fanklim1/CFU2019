﻿// Задание 18.cpp : Этот файл содержит функцию "main". Здесь начинается и заканчивается выполнение программы.
//

#include <iostream>
#include <ctime>
using namespace std;

int main()
{
	srand(time(NULL));
	int a;
	int arr[]{ 0 };
	for (int i = 0; i < 20; i++) {
		
		arr[i] = rand() % 201 - 100; // рандомные числа от -100 до 100
	}
    for (int i = 0; i < 20; i++) {
		cout << arr[i]<<" ";
	}
	int min  = 100; // присваиваю максимальное значение переменная которая отвечает за максимум 
	int max = -100; // присваиваю минимальное значение переменной которая отвечает за  максимум  
	for (int i = 0; i < 20; i++) {
		
		if (arr[i] < min) {
			min = arr[i]; 
		}
		if (arr[i] > max) {
			max = arr[i];
		}
		
	}
	cout<<"min " << min;
	cout << "max " << max;
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
