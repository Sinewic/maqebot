# 1. MAQE Bot
At the root of project you can see "maqebot.php" 

Conditions:
-----------
- MAQE Bot starts at the position (X, Y) of 0, 0
- MAQE Bot is facing up North
- R: Turn 90 degree to the right of MAQE Bot (clockwise)
- L: Turn 90 degree to the left of MAQE Bot (counterclockwise)
- WN: Walk straight for N point(s) where N can be any positive integers. 
     - For example, W1 means walking straight for 1 point.

Running script in a terminal with the sample input of RW15RW1

Code
-----------------
```
php maqebot.php RW15RW1
```

the result : 
```
X: 15 Y: -1 Direction: South
```


# Sample Code
| Code                      | Result                                |
| -------------             | -------------                         |
| RW15RW1                   | X: 15 Y: -1 Direction: South          |
| W5RW5RW2RW1R              | X: 4 Y: 3 Direction = West            |
| RRW11RLLW19RRW12LW1       | X: 7 Y: -12 Direction = South         |
| LLW100W50RW200W10         | X: -210 Y: -150 Direction = West      |
| LLLLLW99RRRRRW88LLLRL     | X: -99 Y: 88 Direction = North        |
| W55555RW555555W444444W1   | X: 1000000 Y: 55555 Direction: East   |



 
 
 



