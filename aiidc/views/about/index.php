<style>
p{
  font-family:sans-serif;
  font-size: 14px;
  text-align:justify;
}
</style>

<div class="container">
	<div class="row">
		<div class="span9">
			<h3>Introduction</h3>
			<p>It has been a longstanding need to have a database on the
				resources available in the state. Thus, the idea of a Resource
				Mapping Exercise occurred to comprehend the availability and
				distribution of raw materials and human resources in the region.
				Proposal for Multidisciplinary Skill Development Centres (MDSD) and
				formulation of a new State Industrial Policy effecting from 2013,
				have finally triggered to bring about the exercise. Nevertheless,
				importance of such a mapping, providing information to the
				entrepreneurs, researchers and policy makers can never be ruled out.
				The outcome of the survey is perceived as a major breakthrough for
				decision making and understanding local competency.</p>

			<h3>Data Collection</h3>
			<p>Data plays a vital role in decision making and policy formulation.
				Setting out the Resource Mapping Survey, collection of data on
				various aspects had been considered to be the paramount task. Task
				of data collection on Raw Materials, Human Resources and
				Infrastructure had been taken up at the developmental block level.
				The State has 219 such blocks under 27 districts and Field Officers
				of the Industries and Commerce Department had been engaged
				extensively to go on data collection drive. Local Panchayats and
				Statistical Sub-Inspectors under the BDOs had been relied on while
				gathering data. Data so collected had been verified later with the
				secondary data available with the government agencies and other
				reliable sources.</p>

			<h3>Questionnaire</h3>
			<p>A questionnaire had been designed for collection and recording of
				data. Data recording has mostly been in pre-assigned codes. Coding
				of data ensures uniformity and relieves the investigators of tedious
				recording procedures. Field Officers were assigned to fill in the
				questionnaire for each Block.</p>

			<h3>Interpretation</h3>
			<p>Data collected in the questionnaire are about occurrence,
				availability and usage of a resource. Different codes have been
				assigned for qualitative values or ordinal variables  of each of these parameters. Each
				resource would therefore assume a code combination of three digits.
				Every permutation of the codes recorded has a distinct
				interpretation as to the competency of the resource. Economic
				viability of a resource has a direct bearing on its availability and
				usage. For example, in the following table, codes for rice,
				pineapple and lemon are recorded as 111, 114 and 248 respectively.
				Code 248 shows that availability of lemon in the locality is nil. On
				the other hand, according to the first two digits, both rice and
				pineapple have high availability (code 11 each). However looking at
				the third digit (rice 1 and pineapple 4), rice is used for
				consumption whereas pineapple goes un-utilised. As such, pineapple
				has a competitive edge over the other item from entrepreneurs' or
				investors' perspective. Based on this principle economic viability
				of the resources has been analysed.</p>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Raw Material</th>
						<th>Occurrence [*]</th>
						<th>Availability [* *]</th>
						<th>Present Usage[*^*]</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>i</td>
						<td>Rice</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
					</tr>
					<tr>
						<td>ii</td>
						<td>Pineapple</td>
						<td>1</td>
						<td>1</td>
						<td>4</td>
					</tr>
					<tr>
						<td>iii</td>
						<td>Lemon</td>
						<td>2</td>
						<td>4</td>
						<td>8</td>
					</tr>
				</tbody>
			</table>

			<h3>Methodology</h3>
			<p>Statistical regression methodology has been applied to deduce the
				economic viability of the resources.</p>
			<p>Resources available in the developmental blocks have been
				categorised by assigning scores according to their viability through
				a multiplicative model. Based on the score so derived for a
				resource, the economic viability of the resource varies in degrees,
				such as 'High', 'Moderate', 'Low' or 'Nil'. On the basis of the
				score obtained by a particular resource across the blocks, blocks
				too are arranged according to the degrees as mentioned above.</p>

			<h3>Scores</h3>
			<h4>For Raw Materials</h4>
			<p>
				Where,</br> <strong>S :</strong> viability score</br> <strong>x :</strong>
				Indicator variable, stands for 'Occurrence' of raw materials taking
				values x=1 while value of occurrence is 'Yes' or x=0 while value of
				occurrence is 'No'</br> <strong>y :</strong> Numerical variable,
				stands for 'Availability' of raw materials taking values y > 0 when
				the value of x = 1 and y = 0 when x = 0. Corresponding to the degree
				of availability of raw materials following values for y have been
				deduced.</br>
			</p>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Availability of raw material</th>
						<th>Normal Distribution</th>
						<th>Value of y</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Consumption, Sale & Processing</td>
						<td>x+3&sigma;</td>
						<td>80</td>
					</tr>
					<tr>
						<td>Consumption only</td>
						<td>x+1&sigma;</td>
						<td>60</td>
					</tr>
					<tr>
						<td>Not enough for consumption</td>
						<td>x</td>
						<td>50</td>
					</tr>
					<tr>
						<td>Not applicable</td>
						<td></td>
						<td>0</td>
					</tr>
				</tbody>
			</table>
			<p>Approximation of Normal Distribution method (x + k&sigma;) is used for
				arriving at the values of y for various degrees of availability of
				raw materials by taking mean (standard) x as 50 and standard
				deviation s as 10.</p>
			<p>Again, the third variable z, related with 'Present usage' takes
				various values corresponding to the combination of availability and
				usage. Here the nature of z is just like a catalyst. So, it takes
				the value with standard 1. Greater the value of z, more is the
				viability of the resource as a commodity or raw material. Value of z
				corresponding to different combination of codes can be viewed here.</p>
			<table class="table table-bordered">
              
              <tbody>
                <tr>
                	<th rowspan="2">Code</th>
                	<th colspan="3">Expansion of the code</th>
                	<th rowspan="2">Grading</th>
                	<th colspan="3">Score</th>
                	<th>Computation</th>
                	
                </tr>
                <tr>
	                <td>occurence=x</td>
	                <td>Availability=y</td>
	                <td>Usage=z</td>
	                <td>x</td>
	                <td>y</td>
	                <td>z</td>
                	<td>RTs=xyz</td>
                </tr>
                
                <tr>
                	<td>111</td>
                	<td>Y</td>
                	<td>CSP</td>
                	<td>C</td>
                	<td>8</td>
                	<td>1</td>
                	<td>80</td>
                	<td>1.8</td>
                	<td>144</td>
                	
                	
                </tr>
                <tr>
                	<td>112</td>
                	<td>Y</td>
                	<td>CSP</td>
                	<td>S</td>
                	<td>7</td>
                	<td>1</td>
                	<td>80</td>
                	<td>1.7</td>
                	<td>136</td>
                	
                	
                </tr>
                <tr>
                	<td>113</td>
                	<td>Y</td>
                	<td>CSP</td>
                	<td>P</td>
                	<td>5</td>
                	<td>1</td>
                	<td>80</td>
                	<td>1.5</td>
                	<td>120</td>
                	
                	
                </tr>
                <tr>
                	<td>114</td>
                	<td>Y</td>
                	<td>CSP</td>
                	<td>W</td>
                	<td>9</td>
                	<td>1</td>
                	<td>80</td>
                	<td>1.9</td>
                	<td>152</td>
                	
                	
                </tr>
                <tr>
                	<td>115</td>
                	<td>Y</td>
                	<td>CSP</td>
                	<td>Csp</td>
                	<td>4</td>
                	<td>1</td>
                	<td>80</td>
                	<td>1.4</td>
                	<td>112</td>
                	
                	
                </tr>
                <tr>
                	<td>116</td>
                	<td>Y</td>
                	<td>CSP</td>
                	<td>CS</td>
                	<td>6</td>
                	<td>1</td>
                	<td>80</td>
                	<td>1.9</td>
                	<td>152</td>
                	
                	
                </tr>
                <tr>
                	<td>117</td>
                	<td>Y</td>
                	<td>CSP</td>
                	<td>SP</td>
                	<td>4</td>
                	<td>1</td>
                	<td>80</td>
                	<td>1.4</td>
                	<td>112</td>
                	
                	
                </tr>
                <tr>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	
                	
                </tr>
                <tr>
                	<td>121</td>
                	<td>Y</td>
                	<td>C</td>
                	<td>C</td>
                	<td>6</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.6</td>
                	<td>96</td>
                	
                	
                </tr>
                <tr>
                	<td>122</td>
                	<td>Y</td>
                	<td>C</td>
                	<td>S</td>
                	<td>8</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.8</td>
                	<td>108</td>
                	
                	
                </tr>
                <tr>
                	<td>123</td>
                	<td>Y</td>
                	<td>C</td>
                	<td>P</td>
                	<td>7</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.7</td>
                	<td>102</td>
                	
                	
                </tr>
                <tr>
                	<td>124</td>
                	<td>Y</td>
                	<td>C</td>
                	<td>W</td>
                	<td>9</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.9</td>
                	<td>114</td>
                	
                	
                </tr>
                <tr>
                	<td>125</td>
                	<td>Y</td>
                	<td>C</td>
                	<td>CSP</td>
                	<td>3</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.3</td>
                	<td>78</td>
                	
                	
                </tr>
                <tr>
                	<td>126</td>
                	<td>Y</td>
                	<td>C</td>
                	<td>CS</td>
                	<td>3</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.3</td>
                	<td>78</td>
                	
                	
                </tr>
                <tr>
                	<td>127</td>
                	<td>Y</td>
                	<td>C</td>
                	<td>SP</td>
                	<td>3</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.3</td>
                	<td>78</td>
                	
                	
                </tr>
                <tr>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	
                	
                </tr>
                <tr>
                	<td>131</td>
                	<td>Y</td>
                	<td>NE</td>
                	<td>C</td>
                	<td>6</td>
                	<td>1</td>
                	<td>50</td>
                	<td>1.6</td>
                	<td>80</td>
                	
                	
                </tr>
                <tr>
                	<td>132</td>
                	<td>Y</td>
                	<td>NE</td>
                	<td>S</td>
                	<td>8</td>
                	<td>1</td>
                	<td>50</td>
                	<td>1.8</td>
                	<td>90</td>
                	
                	
                </tr>
                <tr>
                	<td>133</td>
                	<td>Y</td>
                	<td>NE</td>
                	<td>P</td>
                	<td>7</td>
                	<td>1</td>
                	<td>50</td>
                	<td>1.7</td>
                	<td>85</td>
                	
                	
                </tr>
                <tr>
                	<td>134</td>
                	<td>Y</td>
                	<td>NE</td>
                	<td>W</td>
                	<td>9</td>
                	<td>1</td>
                	<td>50</td>
                	<td>1.9</td>
                	<td>95</td>
                	
                	
                </tr>
                <tr>
                	<td>135</td>
                	<td>Y</td>
                	<td>NE</td>
                	<td>CSP</td>
                	<td>3</td>
                	<td>1</td>
                	<td>50</td>
                	<td>1.8</td>
                	<td>65</td>
                	
                	
                </tr>
                <tr>
                	<td>136</td>
                	<td>Y</td>
                	<td>NE</td>
                	<td>SP</td>
                	<td>3</td>
                	<td>1</td>
                	<td>50</td>
                	<td>1.8</td>
                	<td>65</td>
                	
                	
                </tr>
                <tr>
                	<td>137</td>
                	<td>Y</td>
                	<td>NE</td>
                	<td>SP</td>
                	<td>3</td>
                	<td>1</td>
                	<td>50</td>
                	<td>1.8</td>
                	<td>65</td>
                	
                	
                </tr>
                <tr>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	
                	
                </tr>
                <tr>
                	<td>248</td>
                	<td>N</td>
                	<td>NA</td>
                	<td>NA</td>
                	<td></td>
                	<td>0</td>
                	<td>0</td>
                	<td>0</td>
                	<td>0</td>
                	
                	
                </tr>
                
                
              </tbody>
            </table>
			
			<p>Finally, score S is derived by multiplying x, y and z and based on
				the scores, resources have been placed under the following
				categories of viability:</p>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>High</th>
						<th>Low</th>
						<th>Moderate</th>
						<th>Nil</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>110&#8804;S</td>
						<td>85&#8804;S&#60;110</td>
						<td>0&#60;S&#60;85</td>
						<td>S=0</td>
					</tr>
				</tbody>
			</table>

			<h4>For Human Resource</h4>
			<p>
				Where,</br> <strong>S :</strong> Commercial viability of HR</br> <strong>x
					:</strong> Indicator variable, stands for 'Occurrence' of human
				resources taking values x=1 while value of occurrence is 'Yes' or
				x=0 while value of occurrence is 'No'</br> <strong>y :</strong>
				Numerical variable, stands for 'commercial viability' of human
				resource taking values y > 0 when the value of x = 1 and y = 0 when
				x = 0. Corresponding to the degree of commercial viability of human
				resources following values for y have been deduced</br>
			</p>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Commercial viability of HR</th>
						<th>Normal Distribution</th>
						<th>Value of y</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Good</td>
						<td>x+3&sigma;</td>
						<td>80</td>
					</tr>
					<tr>
						<td>Fair</td>
						<td>x+1&sigma;</td>
						<td>60</td>
					</tr>
					<tr>
						<td>Poor</td>
						<td>x</td>
						<td>50</td>
					</tr>
					<tr>
						<td>Not applicable</td>
						<td></td>
						<td>0</td>
					</tr>
				</tbody>
			</table>
			<p>Approximation of Normal Distribution method (x + k&sigma;) is used
				for arriving at the values of y for various degrees of viability of
				human resources by taking mean (standard) x as 40 and standard
				deviation &sigma; as 10.</p>
			<p>Again, the third variable z, related with 'Present usage' takes
				various values corresponding to the combination of availability and
				usage. Here the nature of z is just like a catalyst. So, it takes
				the value with standard 1. Greater the value of z, more is the
				viability of the resource as a commodity or raw material. Value of z
				corresponding to different combination of codes can be viewed here.</p>
				
			<table class="table table-bordered">
              <tbody>
                <tr>
                	<th rowspan="2">Code</th>
                	<th colspan="3">Expansion of the code</th>
                	<th rowspan="2">Grading</th>
                	<th colspan="3">Score</th>
                	<th>Computation</th>
                	
                </tr>
                <tr>
	                <td>occurence=x</td>
	                <td>Viability=y</td>
	                <td>Usage=z</td>
	                <td>x</td>
	                <td>y</td>
	                <td>z</td>
                	<td>HTs=xyz</td>
                </tr>
                <tr>
                	<td>111</td>
                	<td>Y</td>
                	<td>Good</td>
                	<td>Own</td>
                	<td>2</td>
                	<td>1</td>
                	<td>80</td>
                	<td>1.2</td>
                	<td>96</td>
                </tr>
                <tr>
                	<td>112</td>
                	<td>Y</td>
                	<td>G</td>
                	<td>Comm</td>
                	<td>4</td>
                	<td>1</td>
                	<td>80</td>
                	<td>1.4</td>
                	<td>112</td>
                </tr>
                <tr>
                	<td>113</td>
                	<td>Y</td>
                	<td>G</td>
                	<td>W</td>
                	<td>1</td>
                	<td>1</td>
                	<td>80</td>
                	<td>1.1</td>
                	<td>88</td>
                </tr>
                <tr>
                	<td>114</td>
                	<td>Y</td>
                	<td>G</td>
                	<td>OC</td>
                	<td>4</td>
                	<td>1</td>
                	<td>80</td>
                	<td>1.4</td>
                	<td>112</td>
                </tr>
                <tr>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                </tr>
                
                <tr>
                	<td>121</td>
                	<td>Y</td>
                	<td>Fair</td>
                	<td>Own</td>
                	<td>2</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.2</td>
                	<td>72</td>
                </tr>
                <tr>
                	<td>122</td>
                	<td>Y</td>
                	<td>F</td>
                	<td>Comm</td>
                	<td>4</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.4</td>
                	<td>84</td>
                </tr>
                <tr>
                	<td>123</td>
                	<td>Y</td>
                	<td>F</td>
                	<td>W</td>
                	<td>1</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.1</td>
                	<td>66</td>
                </tr>
                <tr>
                	<td>124</td>
                	<td>Y</td>
                	<td>F</td>
                	<td>OC</td>
                	<td>4</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.4</td>
                	<td>84</td>
                </tr>
                <tr>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                </tr>
                <tr>
                	<td>131</td>
                	<td>Y</td>
                	<td>Poor</td>
                	<td>Own</td>
                	<td>2</td>
                	<td>1</td>
                	<td>40</td>
                	<td>1.2</td>
                	<td>60</td>
                </tr>
                <tr>
                	<td>132</td>
                	<td>Y</td>
                	<td>P</td>
                	<td>Comm</td>
                	<td>4</td>
                	<td>1</td>
                	<td>40</td>
                	<td>1.4</td>
                	<td>70</td>
                </tr>
                <tr>
                	<td>133</td>
                	<td>Y</td>
                	<td>P</td>
                	<td>W</td>
                	<td>1</td>
                	<td>1</td>
                	<td>40</td>
                	<td>1.1</td>
                	<td>55</td>
                </tr>
                <tr>
                	<td>134</td>
                	<td>Y</td>
                	<td>P</td>
                	<td>OC</td>
                	<td>4</td>
                	<td>1</td>
                	<td>40</td>
                	<td>1.4</td>
                	<td>70</td>
                </tr>
                
                <tr>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                </tr>
                <tr>
                	<td>245</td>
                	<td>N</td>
                	<td>NA</td>
                	<td>NA</td>
                	<td></td>
                	<td>0</td>
                	<td>0</td>
                	<td>0</td>
                	<td>0</td>
                </tr>
              </tbody>
            </table>
            
			<p>Finally, score S is derived by multiplying x, y and z and based on
				the scores, quality of infrastructure have been placed under the 
				following categories:</p>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>High</th>
						<th>Low</th>
						<th>Moderate</th>
						<th>Nil</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>88 &#8804; S</td>
						<td>66 &#8804; S &#60; 88</td>
						<td>0 &#60; S &#60; 66</td>
						<td>S=0</td>
					</tr>
				</tbody>
			</table>

			<h4>For General Infrastructure</h4>
			<p>
				Where,</br> <strong>S :</strong> Accessibility of infrastructure</br>
				<strong>x :</strong> Indicator variable, stands for 'availability'
				of general infrastructure taking values x=1 while value of
				availability is 'Yes' or x=0 while value of availability is 'No'</br>
				<strong>y :</strong> Numerical variable, stands for 'Accessibility'
				of the general infrastructure taking values y > 0 when the value of
				x = 1 and y = 0 when x = 0. Corresponding to the degree of
				accessibility of the general infrastructure the following values for
				y have been deduced.</br>
			</p>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Accessibility of infrastructure</th>
						<th>Normal Distribution</th>
						<th>Value of y</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Easy</td>
						<td>x+2&sigma;</td>
						<td>60</td>
					</tr>
					<tr>
						<td>Moderate</td>
						<td>x+1.5&sigma;</td>
						<td>55</td>
					</tr>
					<tr>
						<td>Difficult</td>
						<td>x</td>
						<td>40</td>
					</tr>
					<tr>
						<td>Not applicable</td>
						<td></td>
						<td>0</td>
					</tr>
				</tbody>
			</table>
			<p>Approximation of Normal Distribution method (x + k&sigma;) is used
				for arriving at the values of y for various degrees of accessibility
				of the infrastructure by taking mean (standard) x as 40 and standard
				deviation &sigma; as 10.</p>
			<p>The third variable z, related with 'Condition' takes various
				values corresponding to the combination of degree of accessibility
				and condition. Here the nature of z is just like a catalyst. So, it
				takes the value with standard 1. Greater the value of z, better is
				the infrastructure. Value of z corresponding to different
				combination of codes can be viewed here.</p>
				
			<table class="table table-bordered">
              <tbody>
                <tr>
                	<th rowspan="2">Code</th>
                	<th colspan="3">Expansion of the code</th>
                	<th rowspan="2">Grading</th>
                	<th colspan="3">Score</th>
                	<th>Computation</th>
                	
                </tr>
                <tr>
	                <td>occurence=x</td>
	                <td>Accessibility=y</td>
	                <td>Condition=z</td>
	                <td>x</td>
	                <td>y</td>
	                <td>z</td>
                	<td>GITs=xyz</td>
                </tr>
                <tr>
                	<td>111</td>
                	<td>Y</td>
                	<td>Easy</td>
                	<td>Good</td>
                	<td>3</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.3</td>
                	<td>78</td>
                </tr>
                <tr>
                	<td>112</td>
                	<td>Y</td>
                	<td>E</td>
                	<td>Fair</td>
                	<td>2</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.2</td>
                	<td>72</td>
                </tr>
                <tr>
                	<td>113</td>
                	<td>Y</td>
                	<td>E</td>
                	<td>Poor</td>
                	<td>1</td>
                	<td>1</td>
                	<td>60</td>
                	<td>1.1</td>
                	<td>66</td>
                </tr>
                <tr>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                </tr>
                
                <tr>
                	<td>121</td>
                	<td>Y</td>
                	<td>Moderate</td>
                	<td>Good</td>
                	<td>3</td>
                	<td>1</td>
                	<td>(55)</td>
                	<td>1.3</td>
                	<td>(72)</td>
                </tr>
                <tr>
                	<td>122</td>
                	<td>Y</td>
                	<td>M</td>
                	<td>Fair</td>
                	<td>2</td>
                	<td>1</td>
                	<td>(55)</td>
                	<td>1.2</td>
                	<td>(66)</td>
                </tr>
                <tr>
                	<td>123</td>
                	<td>Y</td>
                	<td>M</td>
                	<td>Poor</td>
                	<td>1</td>
                	<td>1</td>
                	<td>(55)</td>
                	<td>1.1</td>
                	<td>(61)</td>
                </tr>
                <tr>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                </tr>
                <tr>
                	<td>131</td>
                	<td>Y</td>
                	<td>Difficult</td>
                	<td>Good</td>
                	<td>3</td>
                	<td>1</td>
                	<td>40</td>
                	<td>1.3</td>
                	<td>52</td>
                </tr>
                <tr>
                	<td>132</td>
                	<td>Y</td>
                	<td>D</td>
                	<td>Fair</td>
                	<td>2</td>
                	<td>1</td>
                	<td>40</td>
                	<td>1.2</td>
                	<td>48</td>
                </tr>
                <tr>
                	<td>133</td>
                	<td>Y</td>
                	<td>D</td>
                	<td>Poor</td>
                	<td>1</td>
                	<td>1</td>
                	<td>40</td>
                	<td>1.1</td>
                	<td>44</td>
                </tr>
                <tr>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                </tr>
                <tr>
                	<td>244</td>
                	<td>N</td>
                	<td>NA</td>
                	<td>NA</td>
                	<td></td>
                	<td>0</td>
                	<td>0</td>
                	<td>0</td>
                	<td>0</td>
                </tr>
              </tbody>
            </table>	
			<p>Finally, score S is derived by multiplying x, y and z and based on
				the scores, resources have been placed under the following
				categories of viability :</p>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Easy</th>
						<th>Moderate</th>
						<th>Difficult</th>
						<th>Nil</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>70 &#8804; S</td>
						<td>60 &#8804; S &#60; 70</td>
						<td>0 &#60; S &#60; 60</td>
						<td>S=0</td>
					</tr>
				</tbody>
			</table>

			<h3>Evaluating the district putting all its blocks together</h3>
			<p>Again, depending on the degrees of viability or potentiality of a
				resource in various blocks under a district, the district can be
				compiled as 'Major', 'Medium' or 'Deficit' for the particular
				resource. Weighted average method has been applied for scoring the
				district in respect of a resource taking its commerciality in all
				the blocks within the district. In this method blocks with non
				availability of the resource would not be considered.</p>
			<p>
				Thus</br> <strong>S={(80xP)+(50xQ)+(40xR)}/(P+Q+R),</strong></br> </br>where</br>
				<strong>P=No. of 'Major' blocks</br> Q=No. of 'Medium' blocks</br>
					R=No. of 'Minimum' blocks</strong>
			</p>
		</div>
		
		<div class="span3" style="margin-top: 50px;">
			<div class="thumbnail">
				<img src="<?php echo URL; ?>assets/img/tg2.jpg" class="img-polaroid" style=" width: 96%;">
				<div class="caption">
					<p style="text-align: left;">Sri Tarun Gogoi</p>
					<p style="text-align: left;">Hon'ble Chief Minister of Assam</p>
				</div>
			</div>
			<hr>
			<div class="thumbnail">
				<img src="<?php echo URL; ?>assets/img/pb3.png" class="img-polaroid">
				<div class="caption">
					<p style="text-align: left;">Sri Pradyut Bordoloi</p>
					<p style="text-align: left;">Hon'ble Minister for Industry & Commerce</p>
				</div>
			</div>
			<hr>
			<div class="thumbnail">
				<div class="caption">
					<p style="text-align: left;">Mr. P.K Saikia</p>
					<p style="text-align: left;">Additional Director (US)  & Managing Director,AIIDC</p>
					<p><i class="icon-envelope" style="margin-top: 5px;"></i>&nbsp; md@aiidcassam.in</p>
					<p><i class="icon-bell" style="margin-top: 5px;"></i>&nbsp;9435015207</p>
				</div>
			</div>
			<hr>
			<div class="thumbnail">
				
				<div class="caption">
					<p style="text-align: left;">Mr. Kuntal M. S. Bordoloi </p>
					<p style="text-align: left;">Project co-ordinator, Resource Mapping Survey</p>
					<p><i class="icon-envelope" style="margin-top: 5px;"></i>&nbsp; diccassam@gmail.com

					</p>
					<p><i class="icon-bell" style="margin-top: 5px;"></i>&nbsp; 9864034548</p>
				</div>
			</div>
			
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#about').addClass('active');
</script>