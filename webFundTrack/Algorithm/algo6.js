

// // Negative To Zero

// function negativeToZero(arr){

//     for(var i = 0; i < arr.length; i++){

//         if(arr[i] < 0){

//             arr[i] = 0;

//         }

//     }

//     return arr;

// }

// console.log(negativeToZero([1, 2, -1, -3]));


// // Move All Values Forward By One Index

// function moveIndex(arr){

//     var temp = 0;

//     for(var i = 0; i < arr.length; i++){

//         arr[i] = arr[i + 1]
     
//     }

//     arr[arr.length - 1] = 0;

//     return arr;

// }

// console.log(moveIndex([1, 2, 3]));


// // Return An Array With Values In a Reversed Order

// function arrayReverse(arr){

//     var newArr = [];

//     for(var i = arr.length - 1; i >= 0; i--){

//         newArr.push(arr[i]);
        
//     }
    
//     return newArr;

// }

// console.log(arrayReverse([1, 2, 3]));


// // Original Element Twice

// function elementTwice(arr){

//     var newArr = [];

//     var count = 0;

//     for(var i = 0; i < arr.length; i++){

//         newArr[count] = arr[i];

//         newArr[count + 1] = arr[i];

//         count += 2;
//     }

//     return newArr;

// }

// console.log(elementTwice([4, "Ulysses", 42, false]));


