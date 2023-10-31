import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
import xgboost as xgb

def premium_prediction(U_age, U_sex, U_bmi, U_n_child, U_smoke):
    df = pd.read_csv('insurance.csv')
    df1 = df.copy()
    U_age = int(U_age)  
    U_bmi = float(U_bmi)  
    U_n_child = int(U_n_child) 


    df1['smoker'] = df1['smoker'].map({'yes': 1, 'no': 0})
    df1['sex'] = df1['sex'].map({'male': 1, 'female': 0})

    X = df1.drop(['expenses', 'region'], axis=1)
    Y = df1['expenses']

    x_train, x_test, y_train, y_test = train_test_split(X, Y, test_size=0.2, random_state=0)

    xgb_r = xgb.XGBRegressor(objective='reg:linear', n_estimators=10, seed=123, verbosity=0)
    xgb_r.fit(x_train, y_train)

    U_bmi = float(U_bmi)

    if U_sex.lower() == "male":
        U_sex = 1
    else:
        U_sex = 0
    if U_smoke.lower() == "yes":
        U_smoke = 1
    else:
        U_smoke = 0

    arr1 = np.array([[U_age, U_sex, U_bmi, U_n_child, U_smoke]])
    df = pd.DataFrame(arr1, columns=['age', 'sex', 'bmi', 'children', 'smoker'])
    pred1 = xgb_r.predict(df)
    pred1 = int(pred1)//6
    return pred1