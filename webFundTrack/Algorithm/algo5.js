

// // Greater Than Y

// function greaterThanY(arr, y){
    
//     var count = 0;
    
//     for(var i = 0; i < arr.length; i++){
    
//         if(arr[i] > y){
            
//             count++;
            
//             console.log('count is now',count)
            
//             console.log('greater than Y',arr[i]);
            
//         }
    
//     }
// }

// greaterThanY([2,4,6,8], 4);


// // Max Min Average

// function maxMinAverage(arr){

//     var max = 0;
//     var min = arr[0];
//     var ave = 0;

//     for(var i = 0; i < arr.length; i++){

//         if(max < arr[i]){

//             max = arr[i];

//         }

//         if(min > arr[i]){

//                 min = arr[i];

//             }
            
//         ave = ave + arr[i];

//     }

//         ave = ave / arr.length;

//         console.log('max is',max);
        
// 	console.log('min is', min);
        
// 	console.log('average is', ave);

// }

// maxMinAverage([8,7,0,1,2,3]);


// // Replace Negative with Dojo

// function replaceNegative(arr){
    
//     for(var i = 0; i < arr.length; i++){

//         if(arr[i] < 0){

//             arr[i] = 'Dojo';

//         }

//     }

//     return arr;

// }

// console.log(replaceNegative([2,-1,3,-4,5]));



// function removeRange(arr, start, end){
    
//     for(var i = arr.length - 1; i > 0; i--){
    
//         if(start <= i && end >= i){
            
//             arr[i] = arr[arr.length - 1]

//             console.log(i);
            
//             arr.pop()
            
//         }

//     }

//     return arr;
// }

// y = removeRange([20, 30, 40, 50, 60, 70, 80], 2, 4);

// console.log(y);



// // // Not The Correct Answer

// // function removeRange(arr, start, end){
    
// //     var temp = [];

// //     for(var i = 0; i < arr.length; i++){
        
// //         if (start > i || end < i){

// //             temp.push(arr[i]);
            
// //         }

// //     }

// //     arr = temp;

// //     return arr;

// // }

// // y = removeRange([20, 30, 40, 50, 60, 70], 2, 4);

// // console.log(y);


// function a(arr, start, end){

//     var temp = 0;

//     var a = end + 1;

//     for(var i = 0; i < arr.length; i++){

//         if( start <= i && end >= i){

//             arr[i] = arr[a];

//             a++;

//             arr.pop();

//         }
        
//     }

//     return arr;

// }

// console.log(a([2, 3, 4, 5, 6, 7, 8, 9, 10], 2, 3));