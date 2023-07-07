# PHP Test For Messagemedia

- Install dependency first.
```bash
$ composer install
```

- In order to run test. If make tools is present we can use make command to run the test.
```bash
$ make

Fleet Manager
 ✔ Generate fleet  24 ms
 ✔ Generate pairs  2 ms

Fleet
 ✔ Add vessel  1 ms
 ✔ Support craft tasks  1 ms
 ✔ Offensive craft shields  2 ms

Time: 89 ms, Memory: 4.00 MB

OK (5 tests, 60 assertions)
```

## Answers.

Please also supply your answer to the following questions:
1. What is the complexity of your algorithm (in big O notation)?
    - The complexity of the algorithm can be analyzed as follows:

        * Generating the fleet: The complexity is O(n), where n is the number of ships in the fleet.
        * Generating the ship pairs: The complexity is O(n), as we iterate over the ships once to form pairs.
        * Positioning the ship pairs: The complexity is O(n), as we iterate over the ship pairs and their adjacent coordinates.
    
    Overall, the complexity of the algorithm is O(n), where n is the number of ships in the fleet.
2. How would you improve your algorithm?
    - To improve the algorithm, we can consider the following:

        * Use a more efficient data structure for the grid to optimize coordinate lookups and occupancy checks.
        * Implement a smarter pairing algorithm that considers the positions of the ships to minimize movement and find optimal adjacent positions more efficiently.
        * Parallelize or optimize the positioning process by utilizing multi-threading or asynchronous operations to speed up the pairing and positioning of the ships.

3. How would your adapt your algorithm to three dimensions? How would that affect
the complexity?

    - Adapting the algorithm to three dimensions would involve extending the grid and ship coordinates to three dimensions. The grid would become a three-dimensional structure, and the coordinates would consist of x, y, and z components. The adjacency check and movement calculations would need to be adjusted accordingly to consider the three-dimensional space.

In terms of complexity, the addition of the third dimension would increase the complexity of operations such as adjacency checks and movement calculations. The complexity would become O(n^2) for generating ship pairs and positioning them, where n is the number of ships in the fleet. This is because each ship would potentially have more adjacent positions to consider in the three-dimensional space.
